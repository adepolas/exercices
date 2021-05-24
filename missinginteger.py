def solution(A):
    # write your code in Python 3.6
    A.sort()
    ind = 0
    while(True):
        ind += 1
        if ind not in A:
            return ind
