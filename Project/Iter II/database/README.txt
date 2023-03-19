Models.php contains classes for each Table. Each class has an insert(), update(), and delete() function.

You can only use insert() if the object is made from USER INPUT, you cannot use update() and delete() since that object is not in the database
If you get the object from the database (using Select Functions in selectModels.php), you can use update() and delete(). To change the column values just use the setter function defined in each classes. We can only change the non-primary key columns.

There are some comments for each function to understand what it does. If there's anything you guys dont understand about the code or need help using it lmk.