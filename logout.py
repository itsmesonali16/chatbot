from flask import Flask,render_template,request,url_for,flash,jsonify,session,redirect
@app.route("/logout")
def logout():
    session.pop("user")
    redirect('main.html')



