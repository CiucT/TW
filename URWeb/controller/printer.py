from flask import render_template, request


@app.route('/')
def index():
    return render_template('board.html')
