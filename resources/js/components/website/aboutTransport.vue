<template>
  <div>
    <h3 class="page-title">Quản lý khối "Phương tiện vận chuyển"</h3>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="mb-3">Thông tin chung</h4>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ảnh chính (xe)</label>
                  <image-upload type="avatar" v-model="pageData.main_image" title="about-transport-main" />
                </div>
                <div class="form-group">
                  <label>Icon quote (xe tải)</label>
                  <image-upload type="avatar" v-model="pageData.quote_icon" title="about-transport-quote-icon" />
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Tiêu đề</label>
                  <vs-input class="w-100" v-model="pageData.section_title" placeholder="Phương tiện vận chuyển" />
                </div>
                <div class="form-group">
                  <label>Phụ đề (in nghiêng)</label>
                  <vs-input class="w-100" v-model="pageData.subtitle" />
                </div>
                <div class="form-group">
                  <label>Giới thiệu (mỗi đoạn cách nhau một dòng trống)</label>
                  <vs-textarea v-model="pageData.intro_content" rows="5" />
                </div>
                <div class="form-group">
                  <label>Câu quote cuối khối</label>
                  <vs-input class="w-100" v-model="pageData.quote_text" />
                </div>
                <div class="form-group">
                  <label>Chữ chân khối</label>
                  <vs-input class="w-100" v-model="pageData.footer_text" placeholder="KỲ LINH FOOD | HỒ SƠ NĂNG LỰC" />
                </div>
              </div>
            </div>

            <h5 class="mt-3 mb-2">Gallery 3 ảnh nhỏ</h5>
            <div class="row">
              <div class="col-md-4" v-for="(img, idx) in pageData.gallery_images" :key="'gal-' + idx">
                <div class="form-group">
                  <label>Ảnh #{{ idx + 1 }}</label>
                  <image-upload type="avatar" v-model="pageData.gallery_images[idx]" :title="'about-transport-gal-' + (idx + 1)" />
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
            <h4 class="mb-3">Điểm nổi bật (cột trái)</h4>
            <div
              v-for="(item, key) in features"
              :key="'tp-feature-' + key"
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
                  <image-upload type="avatar" v-model="item.image" :title="'tp-feature-' + (key + 1)" />
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
            <h4 class="mb-3">4 badge phía trên ảnh (cột phải)</h4>
            <div
              v-for="(item, key) in badges"
              :key="'tp-badge-' + key"
              class="row"
              style="border:1px solid #eee;border-radius:8px;padding:12px;margin-bottom:16px"
            >
              <div class="col-md-12 mb-2 d-flex align-items-center justify-content-between">
                <strong>Badge #{{ key + 1 }}</strong>
                <label v-if="badges.length > 1" style="cursor:pointer;margin:0;color:#e55" @click="removeBadge(key)">
                  <vs-icon icon="clear"></vs-icon>
                </label>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Icon</label>
                  <image-upload type="avatar" v-model="item.image" :title="'tp-badge-' + (key + 1)" />
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <label>Dòng 1 <span class="text-danger">*</span></label>
                  <vs-input class="w-100" v-model="item.title" placeholder="VD: Hiện đại" />
                </div>
                <div class="form-group">
                  <label>Dòng 2</label>
                  <vs-input class="w-100" v-model="item.description" placeholder="VD: tiên tiến" />
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
            <vs-button color="success" type="border" @click="addBadge">Thêm badge</vs-button>
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
  name: 'aboutTransport',
  data() {
    return {
      pageData: this.defaultPage(),
      features: [this.defaultFeature()],
      badges: [this.defaultBadge()],
    };
  },
  methods: {
    ...mapActions(['saveAboutTransport', 'listAboutTransport', 'loadings']),
    defaultPage() {
      return {
        section_title: 'Phương tiện vận chuyển',
        subtitle: '',
        intro_content: '',
        main_image: '',
        gallery_images: ['', '', ''],
        quote_text: '',
        quote_icon: '',
        footer_text: '',
      };
    },
    defaultFeature() {
      return { title: '', description: '', image: '', sort: 0, status: '1' };
    },
    defaultBadge() {
      return { title: '', description: '', image: '', sort: 0, status: '1' };
    },
    addFeature() {
      this.features.push(this.defaultFeature());
    },
    removeFeature(i) {
      this.features.splice(i, 1);
    },
    addBadge() {
      this.badges.push(this.defaultBadge());
    },
    removeBadge(i) {
      this.badges.splice(i, 1);
    },
    normalizeGallery(raw) {
      let list = [];
      if (Array.isArray(raw)) {
        list = raw.slice();
      } else if (typeof raw === 'string' && raw.trim()) {
        try {
          const parsed = JSON.parse(raw);
          if (Array.isArray(parsed)) list = parsed;
        } catch (e) {
          list = [];
        }
      }
      while (list.length < 3) list.push('');
      return list.slice(0, 3);
    },
    load() {
      this.loadings(true);
      this.listAboutTransport()
        .then((response) => {
          this.loadings(false);
          if (response.page) {
            this.pageData = {
              ...this.defaultPage(),
              ...response.page,
              gallery_images: this.normalizeGallery(response.page.gallery_images),
            };
          }
          const feat = response.features || [];
          this.features = feat.length
            ? feat.map((r) => ({ ...this.defaultFeature(), ...r, status: String(r.status ?? 1) }))
            : [this.defaultFeature()];
          const badgeRows = response.badges || [];
          this.badges = badgeRows.length
            ? badgeRows.map((r) => ({ ...this.defaultBadge(), ...r, status: String(r.status ?? 1) }))
            : [this.defaultBadge()];
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
      const badBadge = this.badges.findIndex((it) => !(it.title || '').trim());
      if (badBadge !== -1) {
        this.$error(`Badge #${badBadge + 1}: Dòng 1 không được để trống.`);
        return;
      }
      this.loadings(true);
      this.saveAboutTransport({
        page: {
          ...this.pageData,
          gallery_images: this.normalizeGallery(this.pageData.gallery_images),
        },
        features: this.features,
        badges: this.badges,
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
