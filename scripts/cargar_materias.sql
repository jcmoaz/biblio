LOAD DATA INFILE 'c:/tmp/materias.csv'
INTO TABLE materias
CHARACTER SET  utf8
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;