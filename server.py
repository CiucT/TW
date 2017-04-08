import os
from URWeb import *
from flask import Flask, render_template
app = Flask('URWeb')
app.config['SECRET_KEY'] ='random'

port=8080


@app.route('/')
def index():
    return render_template('board.html')

if __name__=='__main__':
    app.run()