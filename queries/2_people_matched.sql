# 2 people matched
select analytics.id, u1.name as "Match 1", u2.name as "Match 2", activities.name as "Activity", phylum as "Location", analytics.time as "Date" 
       from analytics
       left join users u1 on kingdom=u1.id
       left join users u2 on genus=u2.id
       left join activities on class=activities.id
       where counter="partial";
