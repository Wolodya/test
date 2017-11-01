/*1 task
select  item.name, group_concat( categories.name) as categories from categories inner join item_categories on categories.id=item_categories.id_category inner join item on item.id=item_categories.id_item where item.name in ('dell','samsung','transformer') group by item.name
*/

/*2 task
 select item.name,node.name from (categories AS node, categories AS parent) inner join item_categories on node.id=item_categories.id_category inner join item on item.id=item_categories.id_item where node.lft BETWEEN parent.lft AND parent.rgt AND parent.name = 'accessories'
*/

/*3 task
select categories.name, count(*) as total from categories inner join item_categories on categories.id=item_categories.id_category where categories.name in ('computers','pc','tv','laptop') group by categories.name;
*/

/*4 task
 select GROUP_CONCAT(categories.name) as categories, count(distinct item.name) as total from categories inner join item_categories on categories.id=item_categories.id_category inner join item on item.id=item_categories.id_item where  categories.name in ('hdd','plasma') 
*/
 
 /*5 task
select parent.name from categories as node,categories as parent where node.lft between parent.lft and parent.rgt and node.name='hdd';
 */
 
 
 