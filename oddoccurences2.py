

# you can write to stdout for debugging purposes, e.g.
# print("this is a debug message")

def solution(A):
    # write your code in Python 3.6
    A.sort()
    tmpNum = A[0]
    occ = 0
    for number in A:
        
        if tmpNum == number:
            occ += 1
        else:
            if occ%2 != 0:
                return tmpNum
            tmpNum = number
            occ = 1

