from email_utils import confirm_token

from email_utils import send_verification_email

from forms import AccountForm

import logging
from flask import session

from flask import render_template, request, redirect, url_for, flash
from app_init import app
from models import db, User
from forms import LoginForm, RegistrationForm

# Removed Flask app initialization here. It will be initialized in app_init.py and imported.
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///users.db'
app.config['SECRET_KEY'] = 'a_very_secret_key'
db.init_app(app)

with app.app_context():
    db.create_all()

@app.route("/account", methods=['GET', 'POST'])
def account():
    if 'username' not in session:
        flash('You must be logged in to view this page.')
        return redirect(url_for('login'))
    form = AccountForm()
    user = User.query.filter_by(username=session['username']).first()
    if form.validate_on_submit():
        if user:
            user.username = form.username.data
            if form.new_password.data:
                user.set_password(form.new_password.data)
            db.session.commit()
            flash('Your account has been updated.')
            return redirect(url_for('home_route'))
    return render_template('account.html', title='Account Settings', form=form, user=user)

@app.route("/register", methods=['GET', 'POST'])
def register():
    form = RegistrationForm()
    if form.validate_on_submit():
        user = User(username=form.username.data, email=form.email.data)
        user.set_password(form.password.data)
        user.is_verified = False  # Set the user as not verified initially
        db.session.add(user)
        db.session.commit()
        send_verification_email(user.email)  # Send verification email
        flash('Congratulations, you are now a registered user! Please check your email to verify your account.')
        return redirect(url_for('login'))
        return redirect(url_for('login'))
    return render_template('register.html', title='Register', form=form)

@app.route("/login", methods=['GET', 'POST'])
def login():
    form = LoginForm()
    if form.validate_on_submit():
        # Updated to allow login with either username or email
        user = User.query.filter((User.username == form.username.data) | (User.email == form.username.data)).first()
        if user is None or not user.check_password(form.password.data):
            flash('Invalid username or password')
            return render_template('login.html', title='Sign In', form=form, error='Invalid username or password')
        if not user.is_verified:
            flash('Email not verified. Please check your email.')
            return render_template('login.html', title='Sign In', form=form, error='Email not verified. Please check your email.')
        session['username'] = user.username
        flash('You have been logged in!')
        return redirect(url_for('home_route'))
    return render_template('login.html', title='Sign In', form=form, error=None)

from gunicorn.app.base import BaseApplication

logging.basicConfig(level=logging.INFO)
logger = logging.getLogger(__name__)

# Removed duplicate Flask app initialization.


@app.route("/logout")
def logout():
    session.pop('username', None)
    flash('You have been logged out.')
    return redirect(url_for('home_route'))

@app.route("/")
def home_route():
    return render_template("home.html")


class StandaloneApplication(BaseApplication):
    def __init__(self, app, options=None):
        self.application = app
        self.options = options or {}
        super().__init__()

    def load_config(self):
        config = {
            key: value
            for key, value in self.options.items()
            if key in self.cfg.settings and value is not None
        }
        for key, value in config.items():
            self.cfg.set(key.lower(), value)

    def load(self):
        return self.application


# Do not remove the main function while updating the app.
@app.route('/confirm/<token>')
def confirm_email(token):
    try:
        email = confirm_token(token)
    except:
        flash('The confirmation link is invalid or has expired.', 'danger')
        return redirect(url_for('login'))
    user = User.query.filter_by(email=email).first_or_404()
    if user.is_verified:
        flash('Account already confirmed. Please login.', 'success')
    else:
        user.is_verified = True
        db.session.add(user)
        db.session.commit()
        flash('You have confirmed your account. Thanks!', 'success')
    return redirect(url_for('login'))

@app.route('/reset_password')
def reset_password():
    return "Password reset functionality to be implemented."

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=8080, debug=True)