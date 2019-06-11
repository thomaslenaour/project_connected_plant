from APDS9960 import *
from BME280 import *
from urllib.request import urlopen
from floorhumidity import *

#SEND VALUES TO add_data.php

luminosity = str(round(val,2))
airhumidity = str(round(airhumidity,2))
pressure = str(round(pressure,2))
temperature = str(round(cTemp,2))
floorhumidity = str(floorhumidity)


url ="http://connected-flowers.000webhostapp.com/adddata?key=bb36efb806c00a3290e                                                                                                             9518931bc2855&luminosity="+luminosity+"&pressure="+pressure+"&temperature="+temp                                                                                                             erature+"&floorhumidity="+floorhumidity+"&airhumidity="+airhumidity
urlopen(url)

print(luminosity)
print(airhumidity)
print(pressure)
print(temperature)
print(floorhumidity)
