from URWeb.controller import server

if __name__ == '__main__':
    server.app.run(host='0.0.0.0', port=server.port, debug=False)
