from apds9960.const import *
from apds9960 import APDS9960
import RPi.GPIO as GPIO
import smbus
from time import sleep

port = 1
bus = smbus.SMBus(port)

apds = APDS9960(bus)

def intH(channel):
    print("INTERRUPT")

GPIO.setmode(GPIO.BOARD)
GPIO.setup(7, GPIO.IN)
try:
    # Interrupt-Event hinzufuegen, steigende Flanke
    GPIO.add_event_detect(7, GPIO.FALLING, callback = intH)


    apds.enableLightSensor()
    oval = -1

    sleep(3)
    val = apds.readAmbientLight()
    if val != oval:
        oval = val

finally:
    GPIO.cleanup()
