INSERT INTO `kisuzi-rental`.`drivers` (`first_name`,`last_name`,`id_no`,`dl_no`,`date_of_birth`,`phone_no`,`email`) VALUES
(Alyosha,Caldero,22769835,23YZ8909,05/01/1900,735885970,acaldero0@behance.net),
(Danyelle,Whoolehan,31907654,98HG8HY,06/07/1997,727490627,dwhoolehan1@hostgator.com),
(Raimund,MacAughtrie,36549820,2667ZF2Y,04/12/1998,123765432,rmacaughtrie2@discovery.com);

SELECT c.first_name, c.last_name, c.id_no, c.phone_no, c.email, c.residential_address, d.first_name, d.last_name, d.id_no, d.phone_no,
 vb.make, vb.model, vb.number_plate, vp.total_price, bk.start_date, bk.end_date FROM bookings bk INNER JOIN customer_details c 
ON bk.customer_id = c.id INNER JOIN drivers d ON bk.driver_id = d.id INNER JOIN vehicle_basics vb ON bk.vehicle_id = vb.id INNER JOIN contracts ct 
ON ct.booking_id = bk.id WHERE bk.id = 4;

SELECT c.first_name, c.last_name, c.id_no, c.phone_no, c.email, c.residential_address, d.first_name, d.last_name, d.id_no, d.phone_no,
 vb.make, vb.model, vb.number_plate, vp.daily_rate, bk.start_date, bk.end_date, ct.signature FROM bookings bk INNER JOIN customer_details c 
ON bk.customer_id = c.id INNER JOIN drivers d ON bk.driver_id = d.id INNER JOIN vehicle_basics vb ON bk.vehicle_id = vb.id INNER JOIN contracts ct 
ON ct.booking_id = bk.id INNER JOIN vehicle_pricing vp ON bk.vehicle_id = vp.vehicle_id WHERE bk.id = 4;