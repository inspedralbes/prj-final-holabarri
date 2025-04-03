<template>
    <div>
      <!-- Este componente no se mostrará visualmente, es para manejar alertas con SweetAlert2 -->
    </div>
  </template>
  
  <script>
  import Swal from "sweetalert2";
  
  export default {
    name: "Alert",
    props: {
      title: {
        type: String,
        required: true
      },
      text: {
        type: String,
        required: true
      }
    },
    methods: {
      mostrarAlerta() {
        Swal.fire({
          title: this.title,
          text: this.text,
          icon: "info",
          iconColor: "#276BF2",
          showConfirmButton: true,
          showCancelButton: true,
          confirmButtonText: "Sí",
          cancelButtonText: "No",
          confirmButtonColor: "#276BF2",
          width: "320px",
        }).then((result) => {
          if (result.isConfirmed) {
            this.$emit('confirmed');
          } else {
            this.$emit('canceled');
          }
        });
      }
    },
    mounted() {
      this.mostrarAlerta(); // Llamamos al método al montar el componente
    }
  };
  </script>