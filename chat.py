from flask import Flask,render_template,request,url_for,flash,jsonify,session,redirect
from wtforms import Form,TextField,TextAreaField,validators,StringField,SubmitField
from recomend import findtagin,recomend,find_price,count_coffee
from Booking import *
from bot import chat
import mysql.connector
'''import pusher

pusher_client = pusher.Pusher(
  app_id='984116',
  key='ae1a5db5a4c08c71fe87',
  secret='bbe1b0fea50829470582',
  cluster='ap2',
  ssl=True
)'''

app=Flask(__name__)
app.secret_key="ae1a5db5a4c08c71fe8674"
        
@app.route("/signin.html")
def GET1():
        return render_template('signin.html')
@app.route("/login.html")
def GET2():
        return render_template('login.html')
@app.route("/about.html")
def GET3():
        return render_template('about.html')
@app.route('/main')
def GET():
        return render_template('main.html')
@app.route('/main2.html')
def GET4():
        return render_template('main2.html')
@app.route('/booking.html')
def GET5():
        return render_template('booking.html')
def user_list():                 ##extracting user inputs from user_bot_chat database
   user=[]
   sql = 'select User from chatbot order by time_stamp asc limit 100;'
   mycursor.execute(sql)
   w_user=list(mycursor.fetchall())
   for i in w_user:
      user.append('User: '+i[0])
   return(user)

def bot_list():                  ##extracting bot responses from user_bot_chat database
   bot=[]
   sql = 'select Bot from chatbot order by time_stamp asc limit 100;'
   mycursor.execute(sql)
   w_bot=list(mycursor.fetchall())
   for i in w_bot:
      bot.append('Bot: '+i[0])
   return(bot)
@app.route('/booking.html',methods=['POST'])
def ff():
        dateRaw=request.form['dateRaw']
        timeRaw=request.form['timeRaw']
        numberOfPeople=request.form['numberOfPeople']
        ownerRaw=request.form['user']
        output=newBooking(ownerRaw,dateRaw,numberOfPeople,timeRaw)
        redirect('main2.html')
        return render_template('/main2.html',op=output) 
def hello(client):
        price = ["price", "cost", "rate", "rates", "how much"]
        ask=["can i have","i would like to have","can", "may", "will", "shall", "would", "should", "give", "server", "deliver"]
        ask1=["table","booking","can you book table for ","reservation","can", "may", "will", "shall", "would", "should", "give", "server", "deliver"]
        question = ["suggest me something", "give","best","recomend me ","special", "server", "deliver"]
        if findtagin(price,client)==1:
                output=find_price(client)
        if findtagin(question,client)==1:
                output=recomend(" ")
        if findtagin(ask,client)==1:
                output=count_coffee(client)
        if findtagin(ask1,client)==1:
                output="To book a table you can click on last icon on your left side"
                
        if findtagin(ask,client)==findtagin(ask1,client)==findtagin(price,client)==findtagin(question,client)==0:
                output=chat(client)
        sql = "INSERT INTO chatbot (User,Bot) VALUES (%s, %s)"
        val = (client,output)
        mycursor.execute(sql, val)
        mydb.commit()
#@app.route('/main2.html',methods=['POST'])
def r():
        try:
                user_input=request.form['msg']
                hello(user_input)
                r=[]
                user = user_list()
                bot = bot_list()
                for j in range(0,len(user)):
                        r.append(user[j])
                        r.append(bot[j])      
                return r
        except:
                r=[]
                user= user_list()
                bot = bot_list()
                for j in range(0,len(user)):
                        r.append(user[j])
                        r.append(bot[j])
                return r

@app.route('/main2.html',methods=['POST'])
def res():
        return render_template('main2.html',user_input=r())
       
def retrive():
        mycursor.execute("SELECT item_no,item_name,img_dir,item_price FROM food where item_no BETWEEN 1001 AND 1018 ")
        # Fetch one record and return result
        display=mycursor.fetchall()
        return display
def retrive1():
        mycursor.execute("SELECT item_no,item_name,img_dir,item_price FROM food where item_no BETWEEN 2001 AND 2016 ")
        # Fetch one record and return result
        display=mycursor.fetchall()
        return display
def retrive2():
        mycursor.execute("SELECT item_no,item_name,img_dir,item_price FROM food WHERE item_no BETWEEN 3001 AND 3016")
        # Fetch one record and return result
        display=mycursor.fetchall()
        return display
def retrive3():
        mycursor.execute("SELECT item_no,item_name,img_dir,item_price FROM food WHERE item_no BETWEEN 4001 AND 4015 ")
        # Fetch one record and return result
        display=mycursor.fetchall()
        return display

@app.route('/menu1.html')
def process1():
        return render_template('menu1.html',value=retrive())
@app.route('/menu2.html')
def process2():
        return render_template('menu2.html',value=retrive1())
@app.route('/menu3.html')
def process3():
        return render_template('menu3.html',value=retrive2())
@app.route('/menu4.html')
def process4():
        return render_template('menu4.html',value=retrive3())
#class ReusableForm(Form):
#name = TextField('Name:', validators=[validators.required()])
#@app.route('/main', methods=['POST'])
@app.route("/logout")
def logout():
    session.pop("user")
    return redirect('/main')



@app.route('/signin.html', methods=['POST'])
def login():
        username = request.form['name']
        phone=request.form['no']
        email=request.form['em']
        password = request.form['pass']
        # Check if account exists using MySQL
        sql="INSERT INTO login(c_nm, c_phone,c_email,c_pass) VALUES(%s,%s,%s,%s)"
        val=(username,phone,email,password)
        mycursor.execute(sql,val)
        mydb.commit()
        return redirect('login.html')
            

@app.route('/login.html', methods=['POST'])
def login2():
    if request.method == 'POST' and 'em' in request.form and 'pass' in request.form:
        # Create variables for easy access
        username = request.form['em']
        session["user"]= username 
        password = request.form['pass']
        # Check if account exists using MySQL
        mycursor.execute('SELECT * FROM login WHERE c_email = %s AND c_pass= %s', (username, password,))
        # Fetch one record and return result
        account =mycursor.fetchone()
        if username in account:
                return redirect('main2.html')
        else:
                return redirect('login.html')
    
 


if __name__ == "__main__":
        mydb = mysql.connector.connect(host='localhost',database='cafe',user='root',password='')
        mycursor = mydb.cursor()
        app.run(debug=False,threaded=False)           
