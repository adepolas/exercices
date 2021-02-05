# The goal is to rotate array A K times; that is, each element of A will be shifted to the right K times.

def rotate(A, K):
    new_array = [None]*len(A)
    max_pos = len(A)-1
    ind = 0

    for i in A:
        future_pos = ind + K
        while future_pos > max_pos:
            future_pos = future_pos - len(A)
        new_array[future_pos] = i
        ind = ind + 1
