SELECT SUBSTRING(comments, LOCATE('Expected Ship Date: ', comments) + 20, 8), comments
FROM sweetwater_test
WHERE comments LIKE '%\nExpected Ship Date: %'