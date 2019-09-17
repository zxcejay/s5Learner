
        function creation() {
            $("#creation").css("display","block");
            $("#topic_id").val('');
            $("#addNewTopicBtn").css("display","none");
        }

        function close_creation() {
            $("#creation").css("display","none");
            $("#topic_id").val('');
            $("#addNewTopicBtn").css("display","block");
        }
        
        function editTopic(topic_id){
            $.get("http://localhost/s5_api/topic/readByTopicId.php?id="+topic_id,
            function(data){
                creation();
                $("#topic").val(data[0].title);
                $("#topic_id").val(data[0].topic_id);
                $("#video_link").val(data[0].video_link);
                CKEDITOR.instances['ckeditor'].setData(data[0].content);
                
            });
        }

        function deleteTopic(topic_id){
            var del = confirm("Are you sure want to delete ?");
            if (del) {
                $.post("http://localhost/s5_api/topic/deleteTopic.php?topic_id="+topic_id,
                function(data){
                    // put something here
                });
                location.reload();
            } else {
                
            }
            
        }

        function updateStatus(topic_id,status) {
            var newStatus = (status == '0') ? '1' : '0';
            var data = JSON.stringify({
                topic_id: topic_id,
                status: newStatus
            });
            $.post("http://localhost/s5_api/topic/updateStatus.php",data,
            function(data){
                location.reload();
            });
        }