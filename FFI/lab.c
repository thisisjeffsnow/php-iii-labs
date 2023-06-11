#include <stdio.h>
// need string.h for strcmp
#include <string.h>

// changed int [] into char* []
void bubble_sort(char* [], int);
void bubble_sort(char* list[], int n) {
    // changed int t into char* t
    int c, d, p;
    char* t;
    for (c = 0 ; c < n - 1; c++) {
        p = 0;
        for (d = 0; d < n - c - 1; d++) {
            // list contains pointers, not ints, so we need strcmp
            if (strcmp(list[d], list[d+1]) > 0) {
                t = list[d];
                list[d] = list[d+1];
                list[d+1] = t;
                p++;
            }
        }
        if (p == 0) break;
    }
}
