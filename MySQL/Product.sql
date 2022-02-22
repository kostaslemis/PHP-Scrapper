-- @block
CREATE DATABASE Product;

-- @block
CREATE TABLE Info (
  ASIN VARCHAR(255) PRIMARY KEY NOT NULL,
  Title TEXT NOT NULL,
  Ratings VARCHAR(255),
  ReviewStars VARCHAR(255),
  BrandName VARCHAR(255) NOT NULL,
  Price VARCHAR(255) NOT NULL,
  ImageURL TEXT
);

-- @block
DROP TABLE info;

-- @block
DROP DATABASE Product;