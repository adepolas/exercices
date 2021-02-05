# A non-empty array A consisting of N integers is given. 
# The array contains an odd number of elements, and each element of the array can be paired with another element that has the same value,
# except for one element that is left unpaired.

def oddOccurences(A):
    my_set = set(A)
    my_dict = dict.fromkeys(my_set, 0)
    ind = 0

    for my_val in A:
        ind = ind + 1
        my_dict[my_val] = my_dict[my_val] + 1

    my_min = min(my_dict, key=my_dict.get)
    return my_min
