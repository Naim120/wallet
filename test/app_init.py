import os
from flask import Flask
from flask_mail import Mail

app = Flask(__name__, static_folder='static')
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///users.db'
app.config['SECRET_KEY'] = 'a_very_secret_key'
app.config['MAIL_SERVER'] = 'smtp.gmail.com'  # Update with your mail server
app.config['MAIL_PORT'] = 587
app.config['MAIL_USE_TLS'] = True
app.config['MAIL_USERNAME'] = os.environ['MAIL_USERNAME']
app.config['MAIL_PASSWORD'] = os.environ['MAIL_PASSWORD']
app.config['MAIL_DEFAULT_SENDER'] = os.environ['MAIL_DEFAULT_SENDER']
app.config['SECURITY_PASSWORD_SALT'] = 'a_very_secret_salt'
mail = Mail(app)