# sudoku-case
A simple sudoku implementation for study purposes

# rules
- Every sudoku puzzle involves 9x9 grid of squares subdivided into 3x3 boxes
- Every square has to contain a single number
- Only numbers from 1 through to 9 can be used
- Each 3x3 box can only contain each number from 1 to 9 once
- Each vertical column can only contain each number from 1 to 9 once
- Each horizontal row can only contain each number from 1 to 9 once

In other words, no number can be repeated in any 3x3 box, row, or column




// docker run --rm --interactive --tty --volume $PWD:/app composer install