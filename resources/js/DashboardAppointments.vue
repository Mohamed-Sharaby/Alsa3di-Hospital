<template>
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">


        <table id="datatable-buttons" class="table table-striped table-bordered text-center">
          <thead>
          <tr>
            <th>#</th>
            <th>رقم الطلب</th>
            <th>اسم العميل   </th>
            <th>حالة الطلب</th>
            <th>تاريخ الانشاء  </th>
            <th>التفاصيل</th>
            <th>العمليات</th>
          </tr>
          </thead>

          <tbody>

          <tr v-for="(cart, index) in carts">
            <td>{{index +1}}</td>
            <td>{{cart.id}}</td>
            <td>{{cart.user.name}}</td>
            <td>{{cart.status_lang}}</td>
            <td>{{cart.created_at}}</td>
            <td>
              <a href="" title="التفاصيل"
                 class="btn-icon waves-effect btn btn-info btn-sm ml-2 rounded-circle"><i
                  class="fa fa-eye"></i>
              </a>
            </td>

            <td class="text-center">
              <button data-url=""
                      :data-name="cart.id"
                      class="btn btn-danger rounded-circle btn-sm ml-2 delete"
                      title="حذف">
                <i class="fa fa-trash"></i>
              </button>

            </td>
          </tr>

          </tbody>
        </table>
      </div>
    </div><!-- end col -->
  </div>
</template>

<script>
export default {
name: "DashboardAppointments",
  data() {
    return {
      carts: []
    }
  },
  mounted() {
    console.log('Hello from vue component')
    window.Echo.channel('new-appointment').listen('NewAppointment', e => {
      console.log('my real time response', e)
    })
  }

}
</script>

<style scoped>

</style>