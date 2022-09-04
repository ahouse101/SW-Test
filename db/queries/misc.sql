SELECT comments
FROM sweetwater_test
WHERE comments NOT LIKE '%call%'
  AND comments NOT LIKE '%sign%'
  AND comments NOT LIKE '%refer%'
  AND comments NOT LIKE '%candy%'
  AND comments NOT LIKE '%smarties%'
  AND comments NOT LIKE '%bit o\' honey%'