# 2-person queue entry
select analytics.id, users.name as "User", activities.name as "Activity", phylum as "Location", analytics.time as "Date" 
       from analytics
       left join users on genus=users.id
       left join activities on kingdom=activities.id
       where counter="matches";
