<template>
  <div>
    <h3 class="page-title">Quản lý khối "Nhân lực" (Giới thiệu)</h3>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="mb-3">Thông tin chung</h4>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ảnh chính (bên phải)</label>
                  <image-upload type="avatar" v-model="pageData.main_image" title="about-hr-main" />
                </div>
                <div class="form-group">
                  <label>Ảnh khám sức khỏe</label>
                  <image-upload type="avatar" v-model="pageData.health_image" title="about-hr-health" />
                </div>
                <div class="form-group">
                  <label>Icon badge khám SK (góc phải)</label>
                  <image-upload type="avatar" v-model="pageData.health_badge_image" title="about-hr-health-badge" />
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Tiêu đề</label>
                  <vs-input class="w-100" v-model="pageData.section_title" placeholder="Nhân lực" />
                </div>
                <div class="form-group">
                  <label>Phụ đề (in nghiêng)</label>
                  <vs-input class="w-100" v-model="pageData.subtitle" placeholder="Đội ngũ chuyên nghiệp..." />
                </div>
                <div class="form-group">
                  <label>Giới thiệu (mỗi đoạn cách nhau một dòng trống)</label>
                  <vs-textarea v-model="pageData.intro_content" rows="5" />
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tiêu đề hộp đào tạo</label>
                      <vs-input class="w-100" v-model="pageData.training_title" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tiêu đề hộp khám SK</label>
                      <vs-input class="w-100" v-model="pageData.health_title" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nội dung khám sức khỏe</label>
                  <vs-textarea v-model="pageData.health_text" rows="3" />
                </div>
                <div class="form-group">
                  <label>Chữ chân khối</label>
                  <vs-input class="w-100" v-model="pageData.footer_text" placeholder="KỲ LINH FOOD | HỒ SƠ NĂNG LỰC" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="mb-3">Danh sách điểm nổi bật (cột trái)</h4>
            <div
              v-for="(item, key) in features"
              :key="'hr-feature-' + key"
              class="row"
              style="border:1px solid #eee;border-radius:8px;padding:12px;margin-bottom:16px"
            >
              <div class="col-md-12 mb-2 d-flex align-items-center justify-content-between">
                <strong>Mục #{{ key + 1 }}</strong>
                <label v-if="features.length > 1" style="cursor:pointer;margin:0;color:#e55" @click="removeFeature(key)">
                  <vs-icon icon="clear"></vs-icon>
                </label>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Icon</label>
                  <image-upload type="avatar" v-model="item.image" :title="'hr-feature-' + (key + 1)" />
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <label>Tiêu đề <span class="text-danger">*</span></label>
                  <vs-input class="w-100" v-model="item.title" />
                </div>
                <div class="form-group">
                  <label>Mô tả</label>
                  <vs-textarea v-model="item.description" rows="2" />
                </div>
                <div class="form-group">
                  <label>Trạng thái</label>
                  <vs-select v-model="item.status">
                    <vs-select-item value="1" text="Hiện" />
                    <vs-select-item value="0" text="Ẩn" />
                  </vs-select>
                </div>
              </div>
            </div>
            <vs-button color="success" type="border" @click="addFeature">Thêm mục</vs-button>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="mb-3">Đào tạo & phát triển (4 ô icon)</h4>
            <div
              v-for="(item, key) in training"
              :key="'hr-training-' + key"
              class="row"
              style="border:1px solid #eee;border-radius:8px;padding:12px;margin-bottom:16px"
            >
              <div class="col-md-12 mb-2 d-flex align-items-center justify-content-between">
                <strong>Ô #{{ key + 1 }}</strong>
                <label v-if="training.length > 1" style="cursor:pointer;margin:0;color:#e55" @click="removeTraining(key)">
                  <vs-icon icon="clear"></vs-icon>
                </label>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Icon</label>
                  <image-upload type="avatar" v-model="item.image" :title="'hr-training-' + (key + 1)" />
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <label>Nội dung <span class="text-danger">*</span></label>
                  <vs-input class="w-100" v-model="item.description" />
                </div>
                <div class="form-group">
                  <label>Trạng thái</label>
                  <vs-select v-model="item.status">
                    <vs-select-item value="1" text="Hiện" />
                    <vs-select-item value="0" text="Ẩn" />
                  </vs-select>
                </div>
              </div>
            </div>
            <vs-button color="success" type="border" @click="addTraining">Thêm ô</vs-button>
          </div>
        </div>
      </div>
    </div>

    <div class="row fixxed">
      <div class="col-12">
        <div class="saveButton">
          <vs-button color="primary" @click="save">Lưu</vs-button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
  name: 'aboutHr',
  data() {
    return {
      pageData: this.defaultPage(),
      features: [this.defaultFeature()],
      training: [this.defaultTraining()],
    };
  },
  methods: {
    ...mapActions(['saveAboutHr', 'listAboutHr', 'loadings']),
    defaultPage() {
      return {
        section_title: 'Nhân lực',
        subtitle: '',
        intro_content: '',
        main_image: '',
        training_title: 'ĐÀO TẠO & PHÁT TRIỂN',
        health_title: 'KHÁM SỨC KHỎE ĐỊNH KỲ',
        health_image: '',
        health_text: '',
        health_badge_image: '',
        footer_text: '',
      };
    },
    defaultFeature() {
      return { title: '', description: '', image: '', sort: 0, status: '1' };
    },
    defaultTraining() {
      return { title: '', description: '', image: '', sort: 0, status: '1' };
    },
    addFeature() {
      this.features.push(this.defaultFeature());
    },
    removeFeature(i) {
      this.features.splice(i, 1);
    },
    addTraining() {
      this.training.push(this.defaultTraining());
    },
    removeTraining(i) {
      this.training.splice(i, 1);
    },
    load() {
      this.loadings(true);
      this.listAboutHr()
        .then((response) => {
          this.loadings(false);
          if (response.page) {
            this.pageData = { ...this.defaultPage(), ...response.page };
          }
          const feat = response.features || [];
          this.features = feat.length
            ? feat.map((r) => ({ ...this.defaultFeature(), ...r, status: String(r.status ?? 1) }))
            : [this.defaultFeature()];
          const train = response.training || [];
          this.training = train.length
            ? train.map((r) => ({ ...this.defaultTraining(), ...r, status: String(r.status ?? 1) }))
            : [this.defaultTraining()];
        })
        .catch(() => {
          this.loadings(false);
        });
    },
    save() {
      const badFeature = this.features.findIndex((it) => !(it.title || '').trim());
      if (badFeature !== -1) {
        this.$error(`Mục nổi bật #${badFeature + 1}: Tiêu đề không được để trống.`);
        return;
      }
      const badTrain = this.training.findIndex((it) => !(it.description || '').trim());
      if (badTrain !== -1) {
        this.$error(`Ô đào tạo #${badTrain + 1}: Nội dung không được để trống.`);
        return;
      }
      this.loadings(true);
      this.saveAboutHr({
        page: this.pageData,
        features: this.features,
        training: this.training,
      })
        .then(() => {
          this.loadings(false);
          this.$success('Lưu thành công');
          this.load();
        })
        .catch(() => {
          this.loadings(false);
          this.$error('Lưu thất bại');
        });
    },
  },
  mounted() {
    this.load();
  },
};
</script>
