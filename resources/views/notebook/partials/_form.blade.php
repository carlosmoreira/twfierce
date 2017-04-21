<div class="panel-body">
    <div class="form-group col-md-6">
        <label for="notebookName">Notebook Name</label>
        {{ Form::text('notebookName', $notebook->notebookName, array_merge(['class' => 'form-control'])) }}
    </div>
    <div class="form-group col-md-12">
        <label for="info">Information</label>
        {{ Form::textarea('notebookContents', $notebook->notebookContents, array_merge(['class' => 'form-control'])) }}
    </div>

</div>
<div class="panel-footer">
    <input type="submit" class="btn btn-warning" value={{$btnName}}>
</div>