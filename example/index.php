 <form action="post.php" method="POST"> <!-- Post URL -->
              <fieldset>
                <div class="form-group">
                  <div class="form-group field-loginform-username required">
<input type="text" id="url" class="form-control" name="url" placeholder="jetsosyal" type="url" required="required"> <!-- Link -->
</div>                </div>
                <div class="form-group">
                    <div class="form-group field-loginform-password required">
<input type="number" min="10" max="10000" class="form-control" type="number" name="amount" placeholder="100" required="required"> <!-- Amount -->
</div>                </div>

                <input type="checkbox" name="teyit" value="teyit" required> I read terms.<br> <!-- Terms Check -->


            <br>
                
                <button type="submit" class="btn btn-outline btn-primary btn-lg btn-block">Create Order</button> <!-- Button -->
              </fieldset>
            </form> 
            
            
            <!-- //min="10" max="10000"// can you change min-max limits. -->
