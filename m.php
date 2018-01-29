<script type="text/javascript">

var siteUrl = '/sites/MySiteCollection';

function deleteListItem() {

    this.itemId = 2;

    var clientContext = new SP.ClientContext(siteUrl);
    var oList = clientContext.get_web().get_lists().getByTitle('Announcements');

    this.oListItem = oList.getItemById(itemId);

    oListItem.deleteObject();

    clientContext.executeQueryAsync(Function.createDelegate(this, this.onQuerySucceeded), Function.createDelegate(this, this.onQueryFailed));
}

function onQuerySucceeded() {

    alert('Item deleted: ' + itemId);
}

function onQueryFailed(sender, args) {

    alert('Request failed. ' + args.get_message() + '\n' + args.get_stackTrace());
}

If you want to retrieve, for example, the new item count that results from a delete operation, include a call to the update() method to refresh the list. In addition, you must load either the list object itself or the itemCount property on the list object before executing the query. If you want to retrieve both a start and end count of the list items, you must execute two queries and return the item count twice, as shown in the following modification of the previous example.
JavaScript

var siteUrl = '/sites/MySiteCollection';

function deleteListItemDisplayCount() {

    this.clientContext = new SP.ClientContext(siteUrl);
    this.oList = clientContext.get_web().get_lists().getByTitle('Announcements');

    clientContext.load(oList);

    clientContext.executeQueryAsync(Function.createDelegate(this, this.deleteItem), Function.createDelegate(this, this.onQueryFailed));
}

function deleteItem() {

    this.itemId = 58;
    this.startCount = oList.get_itemCount();
    this.oListItem = oList.getItemById(itemId);

    oListItem.deleteObject();

    oList.update();

    clientContext.load(oList);
        
    clientContext.executeQueryAsync(Function.createDelegate(this, this.displayCount), Function.createDelegate(this, this.onQueryFailed));
}

function displayCount() {

    var endCount = oList.get_itemCount();
    var listItemInfo = 'Item deleted: ' + itemId + 
        '\nStart Count: ' +  startCount + ' End Count: ' + endCount;
        
    alert(listItemInfo)
}

function onQueryFailed(sender, args) {

    alert('Request failed. ' + args.get_message() + '\n' + args.get_stackTrace());
}

</script>