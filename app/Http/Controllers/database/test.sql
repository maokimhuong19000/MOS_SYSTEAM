SELECT 
	IMPORTED.substance ,  
	IMPORTED.taxcode , 
	IMPORTED.year , 
	IMPORTED.total , 
	FORMAT(IFNULL(AnnaulQuota,0) , 2 ) AS AnnaulQuota , 
	FORMAT(IFNULL(AssignedQuota, 0),2 ) AS AssignedQuota , 
	IMPORTED.id , 
    (IFNULL(AnnaulQuota,0) - IFNULL(AssignedQuota, 0)) AS unassigned ,
    FORMAT(( IFNULL(AssignedQuota, 0) - total ),2) AS balance
FROM 

	( SELECT 
		substance ,
	 	materials.id ,   
	 	`taxcode`,  
	 	year(materialrequests.created_at) as year, 
	 	sum(case when year(materialrequests.created_at)= ".$year." AND materialrequests.import_status > 1   then materialrequestdetails.quantity else 0 end) as total  		
	FROM   `materials`		
	LEFT JOIN  `materialrequestdetails`   ON  materialrequestdetails.material_id = materials.id  
	LEFT JOIN materialrequests   ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`  
				
	WHERE materials.status =1   
	Group by year(materialrequests.created_at), substance , materials.id , `taxcode` 
	) AS IMPORTED 
  	LEFT JOIN  
	( select  
		aquotas.id, 
		aquotas.amount as AnnaulQuota , 
		aquotas.year,
		aquotas.material_id ,
		sum(comquotas.amount) as AssignedQuota
	            from `aquotas` 
	            inner join `comquotas` on `aquotas`.`id` = `comquotas`.`aquota_id`
	            inner join `materials` on `materials`.`id` = `aquotas`.`material_id` 

	            group by aquotas.material_id,aquotas.year ,aquotas.id
	) AS AQuota
	ON IMPORTED.id = AQuota.material_id AND IMPORTED.year = AQuota.year 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

SELECT 
	IMPORTED.substance ,  
	IMPORTED.taxcode , 
	IMPORTED.year , 
	IMPORTED.total , 
	FORMAT(IFNULL(AnnaulQuota,0) , 2 ) AS AnnaulQuota , 
	FORMAT(IFNULL(AssignedQuota, 0),2 ) AS AssignedQuota , 
	IMPORTED.id , 
    (IFNULL(AnnaulQuota,0) - IFNULL(AssignedQuota, 0)) AS unassigned ,
    FORMAT(( IFNULL(AssignedQuota, 0) - total ),2) AS balance
FROM 
	    	( SELECT substance , materials.id ,   `taxcode`,  year(materialrequests.created_at) as year
	 		, sum(case when year(materialrequests.created_at)= ".$year." AND materialrequests.import_status > 1   then materialrequestdetails.quantity else 0 end) as total  		FROM   `materials`		
			LEFT JOIN  `materialrequestdetails`   ON  materialrequestdetails.material_id = materials.id  
			LEFT JOIN materialrequests   ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`  
				
	  		WHERE materials.status =1   
	  		Group by year(materialrequests.created_at), substance , materials.id , `taxcode` ) AS IMPORTED 
  		LEFT JOIN  
  			( SELECT substance , materials.id ,   `taxcode`,materialrequests.request_no , customers.company_name
	 		, (case when year(materialrequests.created_at)= ".$year." AND materialrequests.import_status > 1   then materialrequestdetails.quantity else 0 end ) AS amount ,year(materialrequests.created_at) as year
            FROM   `materials`		
			LEFT JOIN  `materialrequestdetails`   ON  materialrequestdetails.material_id = materials.id  
			LEFT JOIN materialrequests   ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`  
			LEFT JOIN customers ON materialrequests.customer_id = customers.id 
	  		WHERE materials.status =1  ) AS IMPORTEDD
	  	ON IMPORTED.id = IMPORTEDD.id AND IMPORTED.year = IMPORTEDD.year 
	  	LEFT JOIN
	  		( select  aquotas.id, aquotas.amount as AnnaulQuota , aquotas.year,aquotas.material_id ,sum(comquotas.amount) as AssignedQuota
	            from `aquotas` 
	            inner join `comquotas` on `aquotas`.`id` = `comquotas`.`aquota_id`
	            inner join `materials` on `materials`.`id` = `aquotas`.`material_id` 

	            group by aquotas.material_id,aquotas.year ) AS AQuota
	    ON IMPORTED.id = AQuota.material_id AND IMPORTED.year = AQuota.year 