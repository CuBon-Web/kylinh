<template>
  <div>
    <h3 class="page-title">Quản lý trang thiết bị</h3>
    <p class="text-muted mb-3">
      Nội dung hiển thị ở mục “Trang thiết bị” trên trang Giới thiệu. Mục cuối cùng sẽ được ưu tiên layout rộng.
    </p>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div
              class="row"
              v-for="(item, key) in objData"
              :key="'equip-' + key"
              style="margin-bottom: 8px"
            >
              <div class="col-md-12 mb-2 d-flex align-items-center justify-content-between">
                <strong>Thiết bị #{{ key + 1 }}{{ key === objData.length - 1 && objData.length > 1 ? ' (layout rộng)' : '' }}</strong>
                <label
                  v-if="key !== 0"
                  style="cursor: pointer; margin: 0"
                  title="Xóa mục"
                  @click="removeItem(key)"
                >
                  <vs-icon icon="clear"></vs-icon>
                </label>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Ảnh thiết bị</label>
                  <image-upload
                    type="avatar"
                    v-model="item.image"
                    :title="'thiet-bi-' + (key + 1)"
                  ></image-upload>
                </div>
              </div>

              <div class="col-md-9">
                <div class="form-group">
                  <label>Tên thiết bị <span class="text-danger">*</span></label>
                  <vs-input
                    type="text"
                    v-model="item.title"
                    size="default"
                    placeholder="VD: Máy hút chân không"
                    class="w-100"
                  />
                </div>
                <div class="form-group">
                  <label>Mô tả</label>
                  <vs-textarea
                    v-model="item.description"
                    class="w-100"
                    rows="3"
                    placeholder="Mô tả ngắn về thiết bị..."
                  />
                </div>
                <div class="form-group">
                  <label>Trạng thái</label>
                  <vs-select v-model="item.status">
                    <vs-select-item value="1" text="Hiện" />
                    <vs-select-item value="0" text="Ẩn" />
                  </vs-select>
                </div>
              </div>

              <hr style="border: 0.5px solid #04040426; width: 100%; margin: 16px 0" />
            </div>

            <vs-button color="primary" @click="saveItems">Lưu</vs-button>
            <vs-button color="success" @click="addItem">Thêm thiết bị</vs-button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";

const defaultItem = () => ({
  title: "",
  description: "",
  image: "",
  art: "",
  status: "1",
});

export default {
  name: "equipment",
  data() {
    return {
      objData: [defaultItem()],
    };
  },
  methods: {
    ...mapActions(["saveEquipment", "listEquipment", "loadings"]),

    saveItems() {
      const invalid = this.objData.findIndex((it) => !(it.title || "").trim());
      if (invalid !== -1) {
        this.$error(`Thiết bị #${invalid + 1}: Tên không được để trống.`);
        return;
      }
      this.loadings(true);
      this.saveEquipment({ data: this.objData })
        .then(() => {
          this.loadings(false);
          this.$success("Lưu thành công");
          this.loadItems();
        })
        .catch(() => {
          this.loadings(false);
          this.$error("Lưu thất bại");
        });
    },

    addItem() {
      this.objData.push(defaultItem());
    },

    removeItem(i) {
      this.objData.splice(i, 1);
    },

    loadItems() {
      this.loadings(true);
      this.listEquipment()
        .then((response) => {
          this.loadings(false);
          const rows = response.data || [];
          this.objData = rows.length
            ? rows.map((r) => ({
                ...defaultItem(),
                ...r,
                status: String(r.status ?? 1),
              }))
            : [defaultItem()];
        })
        .catch(() => {
          this.loadings(false);
        });
    },
  },
  mounted() {
    this.loadItems();
  },
};
</script>
