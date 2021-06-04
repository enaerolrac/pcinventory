-- DELIMITER $$
--     DROP PROCEDURE IF EXISTS loadProd_sp$$

--         CREATE PROCEDURE loadProd_sp()
--         BEGIN
--         select p.id, p.product_id, p.product_id, p.product_brand, p.qtyonhand, p.price
--             FROM product_list AS p;
--     END $$

-- DELIMITER ;

-- CALL loadProd_sp.sql();