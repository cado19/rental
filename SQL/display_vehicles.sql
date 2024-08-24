select vb.make AS Make, vb.model AS Model, vb.number_plate AS REG, vb.category AS Category, vp.daily_rate AS Rate FROM
`kisuzi-rental`.`vehicle_basics` vb INNER JOIN `kisuzi-rental`.`vehicle_pricing` vp ON vb.id = vp.vehicle_id;   

ALTER TABLE `kisuzi-rental`.`vehicle_basics` 
ADD COLUMN `availability` VARCHAR(45) NULL AFTER `deleted`;

ALTER TABLE `kisuzi-rental`.`vehicle_basics` 
ADD COLUMN `colour` VARCHAR(100) NULL DEFAULT 'White' AFTER `created_at`,
ADD COLUMN `catalog_display` VARCHAR(45) NULL DEFAULT 'No' AFTER `colour`,
CHANGE COLUMN `deleted` `deleted` VARCHAR(45) NULL DEFAULT 'false' ,
CHANGE COLUMN `availability` `availability` VARCHAR(45) NULL DEFAULT 'Free' ;

ALTER TABLE `kisuzi-rental`.`vehicle_extras` 
ADD COLUMN `sunroof` VARCHAR(11) NULL DEFAULT 'No' AFTER `apple_carplay`;