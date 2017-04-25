import os
from URWeb import *
from flask import Flask, render_template
app = Flask('URWeb')
app.config['SECRET_KEY'] ='random'
app.Testing=False
port=5000
host='127.0.0.1'


@app.route('/')
def index():
    return render_template('board.html')

if __name__=='__main__':
    app.run(host='0.0.0.0', port=5000,debug=True)
