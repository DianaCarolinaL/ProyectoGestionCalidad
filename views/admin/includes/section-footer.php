</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
        <footer class="main-footer index">
            <div class="info-box text-center" style="box-shadow: none;">
                <img width="150" src="../../resource/img/logo_ufps_blanco.png">
                <h3>Universidad Fransisco de Paula Santander</h3>
                <h5>Programa Ingenieria de Sistemas</h5>
                <p>Creado por: <b>Jefferson Bahamon Cuevas - Wilmer Fernando Gelves - Andrea Parra - Alexander Ibarra</b></p>
            </div>
        </footer>
    </div>
  <!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->
  <script src="../../resource/js/jquery-2.2.3.min.js"></script>
  <script src="../../resource/js/jquery.slimscroll.min.js"></script>
  <script src="../../resource/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../resource/js/jquery.steps.min.js"></script>
  <script src="../../resource/js/jquery.jgrowl.min.js"></script>
  <script src="../../resource/js/jquery.dataTables.min.js"></script>
  <script src="../../resource/js/dataTables.bootstrap.min.js"></script>
  <script src="../../resource/js/ajax.js"></script>
  <script src="../../resource/js/app.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#example').DataTable({
            "zeroRecords":    "No hay resultados",
            "search":         "Buscar:",
            "emptyTable":     "No hay resultados",
            "infoEmpty":      "Mostrando 0 to 0 de 0 entradas",
            "paginate": {
                "first":      "Inicio",
                "last":       "Ultimo",
                "next":       "Sig",
                "previous":   "Ant"
            }
        });
        $('#example2').DataTable();
    });
  </script>
  <script>
    $('#modal-update-est').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); 
      var action = button.data("whatever");
      var modal = $(this);      
      if (action == "register") {
        modal.find("#action").val(action);
      }
      else {
        var title = button.data('title');
        var place = button.data('place');
        var date_ini = button.data('date-ini');
        var date_fin = button.data('date-fin');
        var thesis = button.data('thesis');
        var id = button.data('id');
                
        modal.find('#id_est').val(id);        
        modal.find('#titulo').val(title);
        modal.find('#fecha_inicio').val(date_ini);
        modal.find('#lugar').val(place);
        modal.find('#fecha_fin').val(date_fin);
        modal.find('#tesis').val(thesis);
      }
      var id_doc = button.data('doc');
      modal.find('#id_doc').val(id_doc);
    });

    $('#modal-update-proy').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); 
      var action = button.data("whatever");
      var modal = $(this);      
      if (action == "register") {
        modal.find("#action2").val(action);
      }
      else {
        var title = button.data('title');
        var place = button.data('place');
        var date_ini = button.data('date');
        var id = button.data('id');
                
        modal.find('#id_proy').val(id);        
        modal.find('#titulo').val(title);
        modal.find('#fecha').val(date_ini);
        modal.find('#lugar').val(place);
      }
      var id_doc = button.data('doc');
      modal.find('#id_doc').val(id_doc);
    });
  </script>
  <script>
    // Evento que carga en un array los proyectos realizados por el docente
    var project = new Array();
    $("body").on("click", "#btn-load-project", function(){
      var inpts = $("#project-doc").find('input');
      var pro = new Object();
      var ok = true;
      inpts.each(function(index){
         var val = $(this);
         if (val.val() != "") {
            var name = val.attr('name');
            pro[name] = val.val();
         }
         else {
            $.jGrowl("Faltan datos por ingresar", {
               position: "bottom-right",
               header: "Registro de estudios",
               theme: "bg-red",
               life: 3000
            });
            ok = false;
            return false;
         }
       });
        if (ok) {
           project.push(pro);
           document.getElementById('project-doc').reset();
           console.log(project);
        }
    });
   /*
   * Evento que carga en un array los estudios realizados por el docente
   */
   var formations = new Array();
   $("body").on("click", "#btn-load-formation", function(){
      var inputs = $("#inputs-doc").find('input');
      var obj = new Object();
      var ok = true;
      inputs.each(function(index){
         var val = $(this);
         if (val.val() != "") {
            var name = val.attr('name');
            obj[name] = val.val();
         }
         else {
            $.jGrowl("Faltan datos en la formacion academica", {
               position: "bottom-right",
               header: "Registro de estudios",
               theme: "bg-red",
               life: 3000
            });
            ok = false;
            return false;
         }
      });
      if (ok) {
         formations.push(obj);
         document.getElementById('form-formation-per').reset();
         console.log(formations);
      }
   });

   $("#wizard").steps({
      headerTag: "h3",
      bodyTag: "section",
      transitionEffect: "slideLeft",
      autoFocus: true,
      onStepChanging: function (event, currentIndex, newIndex) {
         event.preventDefault()
         var fields = $("#form-person").find('input');
         var ok = true;
         fields.each(function(index) {            
            var f = $(this)
            if (f.val() === "") {
               $.jGrowl("Por favor ingrese todos los campos", {
                  position: "bottom-right",
                  header: "Registro de docentes",
                  theme: "bg-red",
                  life: 3000
               });
               ok = false
               return false;
            }            
         })
         return ok
      },
      onFinished: function (event, currentIndex) {
         var form = document.getElementById("form-person");
         var formdata = new FormData(form)
         formdata.append('formation', JSON.stringify(formations));
         formdata.append('projects', JSON.stringify(project));
         $.ajax({
            url: "../../actores/save",
            type: "post",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(response) {
               console.log(response);
               var res = JSON.parse(response);
               if (res.ok) {
                  form.reset();
                  location.href = "../../actores/equipo_de_trabajo/";
               }
               else {
                  $.jGrowl(res.error, {
                     position: "bottom-right",
                     header: "Registro fallido",
                     theme: "bg-red",
                     life: 5000
                  });
               }
            }
         });
      }
   });
  </script>
</body>
</html>