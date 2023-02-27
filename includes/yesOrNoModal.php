<div class="modal select-variant-modal" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" id="yesOrNoModal">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 500px;">
        <div class="modal-content">

            <div class="modal-header d-flex">
                <h3 class="modal-title title">Add Title Here</h3>
                <button type="button" class="close ml-auto" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body content pt-0">
                <p>
                    Add Content Here
                </p>
            </div>
            
            <div class="modal-footer pt-0">
                <button type="button" class="btn btn--primary no">No</button>
                <button type="button" class="btn btn--primary yes">Yes</button>
            </div>
        </div>
    </div>
</div>

<style>
    #yesOrNoModal .yes {
        background-color: #002868;
    }
</style>

<script>
    function showYesOrNoModal(options) {
        var modal = $(document).find('#yesOrNoModal');
        var modalTitle = modal.find('.title');
        var modalContent = modal.find('.content');
        var modalYesButton = modal.find('.yes');
        var modalCloseButton = modal.find('.close');
        var modalNoButton = modal.find('.no');

        var title = options.title || 'Add Title Here';
        var content = options.content || 'Add Content Here';
        var yesLabel = options.yesLabel || 'Yes';
        var noLabel = options.noLabel || 'No';
        var yesHide = options.yesHide;
        var noHide = options.noHide;
        var yesFunction = options.yesFunction;
        var noFunction = options.noFunction;
        var closeFunction = options.closeFunction || noFunction;

        modal.modal('show', {
            backdrop: 'static'
        });

        modalYesButton.show();
        modalNoButton.show();

        if(yesHide) modalYesButton.hide();
        if(noHide) modalNoButton.hide();

        modalTitle.html(title);
        modalContent.html(content);
        modalYesButton.html(yesLabel);
        modalNoButton.html(noLabel);


        modalYesButton.on('click._yes', async function() {
            if(yesFunction) await yesFunction();
            modal.modal('hide');
            modalYesButton.off('click._yes')
        })
        modalNoButton.on('click._no', async function() {
            if(noFunction) await noFunction();
            modal.modal('hide');
            modalYesButton.off('click._no')
        })
        modalCloseButton.on('click._close', async function() {
            if(closeFunction) await closeFunction();
            modal.modal('hide');
            modalYesButton.off('click._close')
        })
    }

    showYesOrNoModal({
        title: 'Hello, World',
        content: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi reprehenderit libero, obcaecati soluta saepe harum quos dolor non facilis assumenda!',
        yesLabel: 'Yes!',
        noLabel: 'No!',
        yesFunction: function() {
            alert('This is callback Function yes')
        },
        noFunction: function() {
            alert('This is callback Function no')
        },
    })
</script>