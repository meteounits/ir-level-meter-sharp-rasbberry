#!/usr/bin/python

import time
import RPi.GPIO as GPIO


GPIO.setmode(GPIO.BCM)

# Define GPIO to use on Pi
TRIG = 11
ECHO = 9

listvalue=[]




for x in range(0, 5):
    

	# Set pins as output and input
	GPIO.setup(TRIG,GPIO.OUT)  # PIn 3 Trigger
	GPIO.setup(ECHO,GPIO.IN)   # Pin 2 Echo

	# Set trigger to False (Low)
	GPIO.output(TRIG, False)

	# Allow module to settle
	time.sleep(0.5)

	# Send 10us pulse to trigger
	GPIO.output(TRIG, True)
	time.sleep(0.00001)
	GPIO.output(TRIG, False)
	starttime = time.time()
	while GPIO.input(ECHO)==0:
	  starttime = time.time()

	while GPIO.input(ECHO)==1:
	  stoptime = time.time()

	# Calculate pulse length
	timediff = stoptime-starttime

	# Distance pulse travelled in that time is time
	# multiplied by the speed of sound (cm/s)
	#mesurement = (timediff * 34300)/2
	mesurement=timediff
	# That was the distance there and back so halve the value
	#distance = distance / 2
	

	listvalue.append(mesurement)


# Just to remove any out of scale mesure, we took five mesure, sort them in order, then we choose the third one (Value [2])
listvalue.sort()

print  listvalue[2]

# Reset GPIO settings
GPIO.cleanup()
