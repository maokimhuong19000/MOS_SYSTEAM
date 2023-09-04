SELECT 
  request.substance ,request.year,  request.material_id , IFNULL(Imported.imported,0) as imported ,
  IFNULL(Quota.total_allow ,0) as total_allow , IFNULL(total_request,0) as total_request
FROM 

  (SELECT customer_id ,  material_id , SUM(amount) as total_request , year ,materials.substance  
  FROM   `quotarequests` 
  INNER JOIN quotarequestdetails ON quotarequests.id = quotarequestdetails.quotarequest_id
  INNER JOIN  `materials` on `materials`.`id` = `quotarequestdetails`.`material_id` 
  WHERE customer_id  = ".Auth::id()." 
  GROUP BY   customer_id ,  material_id , year  ) AS request

Left JOIN
  ( select  aquotas.year,aquotas.material_id ,sum(comquotas.amount) as total_allow
  FROM `aquotas` 
  INNER JOIN `comquotas` on `aquotas`.`id` = `comquotas`.`aquota_id`           
  WHERE `comquotas`.customer_id = ".Auth::id()."
  GROUP BY  aquotas.material_id,aquotas.year    ) AS Quota 
ON  Quota.`year` = request.`year` AND  Quota.material_id =request.material_id
Left JOIN 
  (  select IFNULL(sum(materialrequestdetails.quantity) ,0 ) as imported , materialrequestdetails.material_id ,
      year(materialrequests.created_at) as year
  FROM   `materialrequests`
  INNER JOIN `materialrequestdetails`   on `materialrequestdetails`.`materialrequest_id` = `materialrequests`.`id` 
  WHERE `materialrequests`.`import_status` > 1 AND materialrequests.customer_id =  ".Auth::id()."
  GROUP BY  materialrequestdetails.material_id , year(materialrequests.created_at)  ) AS Imported 
ON  Quota.`year` = Imported.`year` AND  Quota.material_id =Imported.material_id 



SELECT request.substance ,request.year, request.material_id , IFNULL(Imported.imported,0) as imported , 
IFNULL(Quota.total_allow ,0) as total_allow , IFNULL(total_request,0) as total_request 

FROM 
  (SELECT customer_id , material_id , SUM(amount) as total_request , year ,materials.substance 
    FROM `quotarequests` 
    INNER JOIN quotarequestdetails ON quotarequests.id = quotarequestdetails.quotarequest_id 
    INNER JOIN `materials` on `materials`.`id` = `quotarequestdetails`.`material_id` 
    WHERE customer_id = 42 GROUP BY customer_id , material_id , year ) AS request 
Left JOIN 
  ( select aquotas.year,aquotas.material_id ,sum(comquotas.amount) as total_allow 
    FROM `aquotas` 
    INNER JOIN `comquotas` on `aquotas`.`id` = `comquotas`.`aquota_id` 
    WHERE `comquotas`.customer_id = 42 GROUP BY aquotas.material_id,aquotas.year ) AS Quota 
ON Quota.`year` = request.`year` AND Quota.material_id =request.material_id 
Left JOIN 
  ( select IFNULL(sum(materialrequestdetails.quantity) ,0 ) as imported , materialrequestdetails.material_id , 
    year(materialrequests.created_at) as year 
  FROM `materialrequests` 
  INNER JOIN `materialrequestdetails` on `materialrequestdetails`.`materialrequest_id` = `materialrequests`.`id` 
  WHERE `materialrequests`.`import_status` > 1 AND materialrequests.customer_id = 42 
  GROUP BY materialrequestdetails.material_id , year(materialrequests.created_at) ) AS Imported 
ON Quota.`year` = Imported.`year` AND Quota.material_id =Imported.material_id WHERE Quota.year = 2020)

