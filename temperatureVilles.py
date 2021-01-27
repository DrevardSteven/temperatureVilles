# coding: UTF-8
"""
Script: pythonProject6/temperatureVilles.py
Création: admin, le 15/01/2021
"""


# Imports
import requests, mysql.connector, time
# Fonctions
def get_temperature(ville):
    url="http://api.openweathermap.org/data/2.5/weather?q="+ville+",fr&units=metric&lang=fr&appid=0a73790ec47f53b9e1f2e33088a0f7d0"
    return float(requests.get(url).json()['main']['temp'])
    #return print("La température actuelle à",ville, "est de",float(requests.get(url).json()['main']['temp']),"°C")

def set_temperature_bdd(temperature, ville):
    cnx = mysql.connector.connect(user='root', password='', host='127.0.0.1', database='bdd_temperaturevilles')
    cursor = cnx.cursor()
    update_val = ("UPDATE temperaturevilles SET temperature = (%s) WHERE ville = (%s)")
    data = (temperature, ville)
    cursor.execute(update_val, data)
    cnx.commit()
    cursor.close()
    cnx.close()




# Programme principal
def main():
    villes_temp = ['grenoble','rouen','calais','lyon','paris']
    #for i in range(len(villes_temp)):
        #get_temperature(villes_temp[i])
        #set_temperature_bdd(get_temperature(villes_temp[i]), villes_temp[i])
    while True:
        for i in range(len(villes_temp)):
            get_temperature(villes_temp[i])
            set_temperature_bdd(get_temperature(villes_temp[i]), villes_temp[i])
            time.sleep(300)
    #print(get_temperature('rouen'))
    # get_temperature('calais')
    # get_temperature('lyon')
    # set_temperature_bdd(13.2, 'grenoble')


if __name__ == '__main__':
    main()
# Fin
