#!/usr/bin/python

import spidev
import time
import os


# Open SPI bus
spi = spidev.SpiDev()
spi.open(0,0)

# Function to read SPI data from MCP3008 chip
# Channel must be an integer 0-7
def ReadChannel(channel):
  adc = spi.xfer2([1,(8+channel)<<4,0])
  data = ((adc[1]&3) << 8) + adc[2]
  return data

# Function to convert data to voltage level,
# rounded to specified number of decimal places. 
def GetDistance(data,places):
 v = (data/1023.0)*5.0
 d = 16.2537 * v**4 - 129.893 * v**3 + 382.268 * v**2 - 512.611 * v + 306.439
 #d = v
 cm = round(d,places)  
 return int(round(cm))
 return cm
  
listvalue=[]
for x in range(0, 8):

#while True:

  # Read the dist sensor data
  data_read = ReadChannel(0)
  dist_cm = GetDistance(data_read,1)
  
  listvalue.append(dist_cm)
listvalue.sort()
  # Print out results
#print "--------------------------------------------"  
#print("Distanza : {} cm".format(listvalue[4]))  
print  listvalue[4]


  # Wait before repeating loop
#time.sleep(1) 