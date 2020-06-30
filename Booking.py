import datetime
import sqlite3
import re
import time
class Booking:

    def getInfo(self,idNumber):
        self.id=idNumber
        conn=sqlite3.connect("database.db")
        c = conn.cursor()
        c.execute("select * from dates WHERE id=?", idNumber)
        info=c.fetchone()
        print("\n\tYOUR INFO\nOwner: %s\nPeople: %s\nDate: %s\nTime: %s" % (str(info[1]),str(info[2]),str(info[3]),str(info[4])))
        conn.close()

    def getInfoBrief(self,idNumber):
        self.id=int(idNumber)
        conn=sqlite3.connect("database.db")
        c = conn.cursor()
        c.execute("select * from dates WHERE id=?", str(idNumber))
        info=c.fetchone()
        print("People: %s\tDate: %s\tTime: %s" % (str(info[2]),str(info[3]),str(info[4])))
        conn.close()

    def cancel(self):
        conn=sqlite3.connect("database.db")
        c = conn.cursor()
        sure=str(input("Are you sure to cancel[Y/N]: "))
        if sure=="Y":
            c.execute("delete from dates WHERE id=?", self.id)
            conn.commit()
            print("The booking was deleted.")
        else:
            print("The cancelation was stopped.")
        conn.close()


    def setDate(self,dateOfParameter):
        self.dateOf=dateOfParameter

    def setTime(self,timeOfParameter):
        self.timeOf=timeOfParameter

    def setPeople(self,numberOfPeopleParameter):
        self.numberOfPeople=numberOfPeopleParameter

    def setOwner(self,ownerParameter):
        self.owner=ownerParameter

    def saveToDB(self):
        conn=sqlite3.connect("database.db")
        c = conn.cursor()
        c.execute('insert into dates(owner,howmanypeople,dateof,timeof) values(?,?,?,?)', [self.owner,self.numberOfPeople,self.dateOf,self.timeOf])
        conn.commit()
        return c.lastrowid
        conn.close()

def newBooking(ownerRaw,dateRaw,numberOfPeople,timeRaw):
    aBooking=Booking()

    #dateRaw=input("Select a date(dd-mm-yyyy): ")
    dateProcessed=datetime.datetime.strptime(dateRaw, '%d-%m-%Y')
    aBooking.setDate(dateProcessed)

    #ownerRaw=str(input("Owner name(Gozde, Mehmet etc.): "))
    aBooking.setOwner(ownerRaw)

    #numberOfPeople=input("Number of people(3,4,5 etc): ")
    aBooking.setPeople(numberOfPeople)

    #timeRaw=input("Select a time(11,17 etc.): ")
    aBooking.setTime(timeRaw)

    bookingID=aBooking.saveToDB()
    r="Your table is booked booking ID is:"+str( bookingID)
    return r

def deleteBooking():
    idRaw=input("Please type your booking ID number: ")
    aBooking=Booking()
    aBooking.getInfo(idRaw)
    aBooking.cancel()

def bookingStatus():
    dateRaw=input("Select a date(dd-mm-yyyy): ")
    dateProcessed=datetime.datetime.strptime(dateRaw, '%d-%m-%Y')

    conn=sqlite3.connect("database.db")
    c = conn.cursor()
    c.execute("select * from dates WHERE dateOf=(?)", (str(dateProcessed),))
    info=c.fetchall()
    print("STATUS OF the DAY:\n")
    for booking in info:
        aBooking=Booking()
        aBooking.getInfoBrief(booking[0])
    input("Enter a key to continue...")

    conn.close()
def fdate(s):
    match = re.search('\d{4}-\d{2}-\d{2}', s)
    date = datetime.datetime.strptime(match.group(), '%Y-%m-%d').date()
    return date

def fdigi(s):
    res = ''.join(filter(lambda i: i.isdigit(),s))
    return str(res) 

def ftime(s):
    match= re.search('[0-9]*[0-9]*:[0-9]*[0-9]*',s)
    time=match.group(0)
    return time
