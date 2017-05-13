
from flask import Flask, render_template
app = Flask('URWeb')
app.config['SECRET_KEY'] ='random'
app.Testing=True
port=80
host='localhost'
urls = ('/hello', 'Index', 'Board')

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/board')
def board():
    return render_template('board.html')


