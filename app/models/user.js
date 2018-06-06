import DS from 'ember-data';
import { computed } from '@ember/object';

const COLORS = {
  "red": "#FE2712",
  "blue": "#0247FE",
  "yellow": "#FEFE33",
  "green": "#66B032",
  "orange": "#FB9902",
  "purple": "#8601AF",
  "red-orange": "#FC600A",
  "yellow-orange": "#FCCC1A",
  "yellow-green": "#B2D732",
  "blue-green": "#347C98",
  "blue-purple": "#4424D6",
  "red-purple": "#C21460",
}

export default DS.Model.extend({
  name: DS.attr('string'),
  color: DS.attr('string'),
  hexcode: computed('colors', () => COLORS[this.get('color')]),
  connections: DS.attr(),
});
