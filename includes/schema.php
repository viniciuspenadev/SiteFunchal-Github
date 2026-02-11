<?php
// Global Structured Data (JSON-LD)
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "<?php echo $base_url; ?>/#organization",
      "name": "Funchal Pescados",
      "url": "<?php echo $base_url; ?>",
      "logo": {
        "@type": "ImageObject",
        "url": "<?php echo asset_url('assets/img/funchalpescados.webp'); ?>",
        "width": 112,
        "height": 96
      },
      "sameAs": [
        "https://www.instagram.com/funchalpescados",
        "https://www.facebook.com/funchalpescados"
      ],
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+55-11-2090-6100",
        "email": "contato@funchalpescados.com.br",
        "contactType": "sales",
        "areaServed": "BR",
        "availableLanguage": ["Portuguese", "English"]
      }
    },
    {
      "@type": "LocalBusiness",
      "@id": "<?php echo $base_url; ?>/#localbusiness",
      "name": "Funchal Pescados",
      "image": "<?php echo asset_url('assets/img/og-share.jpg'); ?>",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "R. Cândido Vale, 319",
        "addressLocality": "Tatuapé",
        "addressRegion": "São Paulo",
        "postalCode": "03068-010",
        "addressCountry": "BR"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": -23.539,
        "longitude": -46.576
      },
      "url": "<?php echo $base_url; ?>",
      "telephone": "+551120906100",
      "email": "contato@funchalpescados.com.br",
      "priceRange": "$$$",
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
          "opens": "08:00",
          "closes": "18:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Saturday",
          "opens": "08:00",
          "closes": "12:00"
        }
      ]
    }
  ]
}
</script>