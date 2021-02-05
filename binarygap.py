# regex package
import re

##A binary gap within a positive integer N is any maximal sequence of consecutive zeros that is surrounded by ones at both ends in the binary representation of N
##For example, number 9 has binary representation 1001 and contains a binary gap of length 2. 
##The number 529 has binary representation 1000010001 and contains two binary gaps: one of length 4 and one of length 3.

def getBinaryGaps(N):
    #transforming my decimal/integer to binary without 0b prefix
    nBinary = bin(N)[2:]
   
    oneCount = nBinary.count("1")
    zeroCount = nBinary.count("0")

    if  oneCount<2 or zeroCount==0:
        return 0
    
    indexes = []
    #getting positions of every 1
    for match in re.finditer('1', nBinary):
        indexes.append(match.start())

    #calculating the biggest 0 gap
    diff = 0
    for i in range(0, len(indexes)-1):
        tmp_diff = indexes[i+1] - indexes[i] - 1
        
        if diff < tmp_diff:
            diff = tmp_diff
    
    return diff
#getBinaryGaps(2)
