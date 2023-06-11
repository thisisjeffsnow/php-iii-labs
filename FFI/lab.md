## FFI Lab

Use the slides shown in this section as a guide to do the following:

1. Copy and modify bubble.c and convert the array to data type char instead of int.
2. Compile into a shared library.
3. Define PHP code that sorts the following array and displays the results using your newly compiled C library:

```
['pear','apple','cherry','banana','kiwi',
'peach','grape','strawberry','blueberry']
```

## Solution

bubble.c contains the original bubble sort code.

The modified bubble sort is now in lab.c

The data type for int [] was changed to char\* [] as the array is actually strings instead of integers, not single characters.

I compiled that C code using

```
gcc -c -Wall -Werror -fpic lab.c
```

to create an output file. Then ran

```
gcc -shared -o liblab.so lab.o
```

to convert the output file into a shared library.

I then created ffi.php which contains the code to initialize and sort the fruit array using our shared library liblab.so
