select vb.make AS Make, vb.model AS Model, vb.number_plate AS REG, vb.category AS Category, vp.daily_rate AS Rate FROM
`kisuzi-rental`.`vehicle_basics` vb INNER JOIN `kisuzi-rental`.`vehicle_pricing` vp ON vb.id = vp.vehicle_id;   

ALTER TABLE `kisuzi-rental`.`vehicle_basics` 
ADD COLUMN `availability` VARCHAR(45) NULL AFTER `deleted`;