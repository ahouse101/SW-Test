UPDATE sweetwater_test
SET shipdate_expected = STR_TO_DATE(SUBSTRING(comments, LOCATE('Expected Ship Date: ', comments) + 20, 8), '%m/%d/%y')
WHERE comments LIKE '%\nExpected Ship Date: %'