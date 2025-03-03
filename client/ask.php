<div class="container">
    <h2>Ask a question</h2>
    <form action="./server/requests.php" method="post">
        <input type="hidden" name="ask" value="true">
        <div class="mb-3 margin-bottom-15">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter question... ">
        </div>
        <div class="mb-3 margin-bottom-15">
            <label for="descrription" class="form-label">Descrription</label>
            <textarea class="form-control" id="descrription" name="description" placeholder="Enter question Description... "></textarea>
        </div>
        <div class="mb-3 margin-bottom-15">
            <label for="title" class="form-label">Category</label>
            <?php
            include("./client/category.php"); 
            ?>
        </div>
        <button type="submit" name="ask" class="btn btn-primary">Ask Question</button>
    </form>
</div>