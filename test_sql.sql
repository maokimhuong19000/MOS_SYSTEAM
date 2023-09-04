        $Result = Quotarequest::join(quotarequestdetails, quotarequests.id,=,quotarequestdetails.quotarequest_id)
                
                -
                ->
               


SELECT  quotarequestdetails.material_id,
         quotarequestdetails.amount AS total  , 
        materials.substance ,
         SUM(IFNULL(comquotas.amount,0)) AS comquota ,
        IFNULL(aquotas.amount,0) AS aquota ,
        aquotas.id 
FROM        quotarequests 
INNER JOIN quotarequestdetails 
ON         quotarequests.id=quotarequestdetails.quotarequest_id
INNER JOIN materials 
ON         quotarequestdetails.material_id =materials.id
left join  aquotas
ON         aquotas.material_id = quotarequestdetails.material_id
            AND aquotas.year = 2022
left join  comquotas
ON         aquotas.id = comquotas.aquota_id         
where      quotarequests.id = 70 
AND        quotarequests.customer_id = 10
AND        quotarequests.year= 2022                         
                            
group By   aquotas.id,quotarequestdetails.material_id,quotarequests.year,
           materials.substance,aquotas.amount ,quotarequestdetails.amount 