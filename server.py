import os
from URWeb import *
from flask import Flask, render_template
app = Flask('URWeb')
app.config['SECRET_KEY'] ='random'
app.Testing=False
port=5000
host='localhost'
urls = (
  '/hello', 'Index', 'Board'
)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/board')
def board():
    return render_template('board.html')

if __name__=='__main__':
    app.run(host='0.0.0.0', port=5000,debug=False)
